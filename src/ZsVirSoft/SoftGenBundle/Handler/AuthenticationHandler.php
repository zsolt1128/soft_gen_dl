<?php

namespace App\ZsVirSoft\SoftGenBundle\Handler;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;

use Symfony\Component\HttpFoundation\RedirectResponse;
//use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\Routing\Router;
//use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
//use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
//use Symfony\Component\Security\Http\HttpUtils;

// "use" statements here

class AuthenticationHandler 
implements AuthenticationSuccessHandlerInterface
//,           AuthenticationFailureHandlerInterface
{
	
	protected $router;
	
	public function __construct(Router $router)
	{
		$this->router = $router;
		
	}
		
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        if ($request->isXmlHttpRequest()) {
            $result = array('success' => true);
            return new Response(json_encode($result));
        } else {
//            return new Response(json_encode('ok'));
            // Handle non XmlHttp request here
       //$route =      $this->router -> redirectToRoute('admin', ['request' => "dd"], 307);
    //return new RedirectResponse($route);
    //return new RedirectResponse($this->router->generate('admin', array('slug' => 'my-blog-post')));
        return new RedirectResponse($this->router->generate('admin'));
	        
        }
    }

    // public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    // {
        // if ($request->isXmlHttpRequest()) {
            // $result = array('success' => false);
            // return new Response(json_encode($result));
        // } else {
            // // Handle non XmlHttp request here
        // }
    // }
}