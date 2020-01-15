<?php

namespace App\Http\Controllers;

use App\DesignPatterns\Fundamental\Delegation\AppMessenger;
use App\DesignPatterns\Fundamental\PropertyContainer\BlogPost;
use App\DesignPatterns\Fundamental\PropertyContainer\PropertyContainer;


/**
 * Контейнер свойств (англ. property container)
 *
 * @url http://design-pattern.local/fundamentals/property-container
 *
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
 * @throw \Exception
 */
class FundamentalPatternsController extends Controller
{
    public function PropertyContainer()
    {
        $name = "Контейнер свойств";
        $description = PropertyContainer::getDescription();
        $faq = PropertyContainer::getFaq();

        $item = new BlogPost();

        $item->setTitle('Заголовок статьи');
        $item->setCategory(10);

        $item->addProperty('view_count', 100);

        $item->addProperty('last_update', '2030-02-01');
        $item->updateProperty('last_update', '2030-02-02');

        $item->addProperty('read_only', true);
        $item->deleteProperty('read_only');

        // Exception: Property [nonexistentProp] not found
        // $item->updateProperty('nonexistentProp', '123');

        return view('dump', compact('name', 'description', 'faq', 'item'));
    }

    /**
     * @url http://design-pattern.local/fundamentals/delegation
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function Delegation()
    {
        $name = 'Делегирование (Delegation)';
        $description = AppMessenger::getDescription();
        $faq = AppMessenger::getFaq();

        $item = new AppMessenger();

        $item->setSender('sender@imail.net')
            ->setRecipient('recipient@mmail.com')
            ->setMessage('Hello email messenger!')
            ->send();

        \Debugbar::info($item);

        $item->toSms()
            ->setSender('1111111111')
            ->setRecipient('22222222222')
            ->setMessage('Hello sms messenger!')
            ->send();

        \Debugbar::info($item);

        return view('dump', compact('name', 'description', 'faq'));
    }
}
