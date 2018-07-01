<?php

namespace App\ZsVirSoft\SoftGenBundle\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\PreAuthenticatedToken;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Authentication\SimplePreAuthenticatorInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyAuthenticator implements SimplePreAuthenticatorInterface, AuthenticationFailureHandlerInterface
{
    public function createToken(Request $request, $providerKey)
    {
        // look for an apikey query parameter
        //$apiKey = $request->query->get('apikey');
		//if (!$apiKey) $apiKey = $request -> get('password');
	    $apiKey = filter_var(trim($apiKey = $request -> get('apikey')), FILTER_SANITIZE_STRING); //
        if (!$apiKey) {
           throw new BadCredentialsException();
		}


				//$apiKey = $request -> get('password');
		
	    // $email = filter_var(trim($request -> get('email')), FILTER_SANITIZE_EMAIL);
	    // $password = filter_var(trim($request -> get('password')), FILTER_SANITIZE_STRING);
	        // if ( !filter_var($email, FILTER_VALIDATE_EMAIL)) {
	            // // Set a 400 (bad request) response code and exit.
	            // http_response_code(400);
	            // echo "Oops! There was a problem with your login. Please enter a valid email address and try again.";
	            // exit;
	        // }
      	// if (!$password) throw new BadCredentialsException();
// 
// 		
		// $user = $this->userProvider->findOneBy(array('email' => $email,'password' => $password,'active' => true));
// 		
      	// if (!$user) throw new BadCredentialsException();
// 		
		// $apiKey = $user -> getApiKey();
		//$password = json_decode($request->getContent(), true);
		//if (!$apiKey) $apiKey = $password['password'];

        // or if you want to use an "apikey" header, then do something like this:
        // $apiKey = $request->headers->get('apikey');


            // or to just skip api key authentication
            // return null;
        //}

        return new PreAuthenticatedToken(
            'anon.',
            $apiKey,
            $providerKey
        );
    }

    public function supportsToken(TokenInterface $token, $providerKey)
    {
        return $token instanceof PreAuthenticatedToken && $token->getProviderKey() === $providerKey;
    }

    public function authenticateToken(TokenInterface $token, UserProviderInterface $userProvider, $providerKey)
    {
        if (!$userProvider instanceof ApiKeyUserProvider) {
            throw new \InvalidArgumentException(
                sprintf(
                    'The user provider must be an instance of ApiKeyUserProvider (%s was given).',
                    get_class($userProvider)
                )
            );
        }

/* ha van email és password, akkor ellenőrízni kell, ha rendben, akkor menteni kell a tokent
 * ha nincs email és password, akkor a tokent kell ellenőrízni
 */


        $apiKey = $token->getCredentials();
        $username = $userProvider->getUsernameForApiKey($apiKey, $userProvider);

        if (!$username) {
            // CAUTION: this message will be returned to the client
            // (so don't put any un-trusted messages / error strings here)
            throw new CustomUserMessageAuthenticationException(
                sprintf('API Key "%s" does not exist.', $apiKey)
            );
        }

        $user = $userProvider->loadUserByUsername($username);

        return new PreAuthenticatedToken(
            $user,
            $apiKey,
            $providerKey,
            $user->getRoles()
        );
    }
	
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        return new Response(
            // this contains information about *why* authentication failed
            // use it, or return your own message
            strtr($exception->getMessageKey(), $exception->getMessageData()),
            401
        );
    }
	
}

?>