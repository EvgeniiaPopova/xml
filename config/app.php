<?php
/**
 * Created by:
 * User: Zhenia Popova
 * E-mail: zhenia@avaito.com
 * Date: 11.04.17
 */


return [
    'providers' => [
        Collective\Html\HtmlServiceProvider::class,
    ],
    'aliases' => [
        'Form' => Collective\Html\FormFacade::class,
        'Html' => Collective\Html\HtmlFacade::class,
    ],


];