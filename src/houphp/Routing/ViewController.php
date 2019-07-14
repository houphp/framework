<?php

namespace Houphp\Routing;

use Houphp\Contracts\View\Factory as ViewFactory;

class ViewController extends Controller
{
    /**
     * The view factory implementation.
     *
     * @var \Houphp\Contracts\View\Factory
     */
    protected $view;

    /**
     * Create a new controller instance.
     *
     * @param  \Houphp\Contracts\View\Factory  $view
     * @return void
     */
    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }

    /**
     * Invoke the controller method.
     *
     * @param  array  $args
     * @return \Houphp\Contracts\View\View
     */
    public function __invoke(...$args)
    {
        [$view, $data] = array_slice($args, -2);

        return $this->view->make($view, $data);
    }
}
