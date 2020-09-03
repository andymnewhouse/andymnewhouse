<?php

namespace App\View\Components\Antlers;

use Illuminate\View\Component;
use Statamic\Contracts\Structures\Structure as StructureContract;
use Statamic\Facades\Site;
use Statamic\Facades\URL;
use Statamic\Structures\TreeBuilder;

class Nav extends Component
{
    public $from;
    public $includeHome;
    public $site;
    public $showUnpublished;
    public $tree;

    public function __construct($from = 'collection::pages', $includeHome = true, $site = null, $showUnpublished = false)
    {
        $this->from = $from;
        $this->includeHome = $includeHome;
        $this->site = $site ?? Site::current()->handle();
        $this->showUnpublished = $showUnpublished;

        $this->tree = $this->structure($from);
    }

    public function render()
    {
        return view('components.antlers.nav');
    }

    protected function structure($handle)
    {
        if ($handle instanceof StructureContract) {
            $handle = $handle->handle();
        }

        $tree = (new TreeBuilder)->build([
            'structure' => $handle,
            'include_home' => $this->includeHome,
            'site' => $this->site,
            'from' => null,
        ]);

        return $this->toArray($tree);
    }

    public function toArray($tree, $parent = null, $depth = 1)
    {
        return collect($tree)->map(function ($item) use ($parent, $depth) {
            $page = $item['page'];

            if ($page->reference() && ! $page->referenceExists()) {
                return null;
            }

            if (! $this->showUnpublished && $page->entry() && ! $page->entry()->published()) {
                return null;
            }

            $data = $page->toAugmentedArray();
            $children = empty($item['children']) ? [] : $this->toArray($item['children'], $data, $depth + 1);

            return array_merge($data, [
                'children'    => $children,
                'parent'      => $parent,
                'depth'       => $depth,
                'is_current'  => rtrim(URL::getCurrent(), '/') == rtrim($page->url(), '/'),
                'is_parent'   => Site::current()->url() === $page->url() ? false : URL::isAncestorOf(URL::getCurrent(), $page->url()),
                'is_external' => URL::isExternal($page->absoluteUrl()),
            ]);
        })->filter()->values()->all();
    }
}
