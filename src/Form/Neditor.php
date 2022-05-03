<?php

namespace Laradocs\DcatNeditor\Form;

use Dcat\Admin\Form\Field;
use Illuminate\Support\Arr;

class Neditor extends Field
{
    protected static $js = [
        '@extension/laradocs/dcat-neditor/neditor/neditor.config.js',
        '@extension/laradocs/dcat-neditor/neditor/neditor.all.js',
        '@extension/laradocs/dcat-neditor/neditor/neditor.service.js',
        '@extension/laradocs/dcat-neditor/neditor/i18n/zh-cn/zh-cn.js',
        '@extension/laradocs/dcat-neditor/neditor/third-party/browser-md5-file.min.js',

        '@extension/laradocs/dcat-neditor/neditor/dialogs/135editor/135editor.js',
    ];

    protected $view = 'laradocs.dcat-neditor::neditor';

    public static $serverUrl = '/files/upload';

    public static $neditorHomeUrl = '/vendor/dcat-admin-extensions/laradocs/dcat-neditor/neditor/';

    public static $neditorConfigOptions = <<<OPTIONS
{
    "UEDITOR_HOME_URL": "",
    "serverUrl": "",
    "allowDivTransToP": false,
    "xssFilterRules": false,
    "inputXssFilter": false,
    "outputXssFilter": false,
    "initialFrameHeight": 320,
    "toolbars": [
        [
            "135editor",
            "fullscreen",
            "source",
            "|",
            "undo",
            "redo",
            "|",
            "bold",
            "italic",
            "underline",
            "fontborder",
            "strikethrough",
            "rowspacingtop",
            "rowspacingbottom",
            "lineheight",
            "removeformat",
            "formatmatch",
            "autotypeset",
            "blockquote",
            "pasteplain",
            "|",
            "forecolor",
            "backcolor",
            "insertorderedlist",
            "insertunorderedlist",
            "selectall",
            "cleardoc",
            "|",
            "superscript",
            "subscript"
        ]
    ]
}
OPTIONS;

    protected $config = [];

    public function setNeditorhomeUrl()
    {
        $this->config('UEDITOR_HOME_URL', static::$neditorHomeUrl);

        return $this;
    }

    public function setServerUrl()
    {
        $this->config('serverUrl', static::$serverUrl);

        return $this;
    }

    protected function config($key = '', $value = '')
    {
        if (!$this->config) {
            $this->config = json_decode(static::$neditorConfigOptions, true) ?? [];
        }

        if ($key) {
            $this->config = Arr::set($this->config, $key, $value);
        }

        return $this->config;
    }

    public function render()
    {
        $config = $this->setNeditorhomeUrl()
            ->setServerUrl()
            ->config();

        $this->addVariables([
            'editor_id' => 'neditor_'.uniqid(),
            'config' => $config,
        ]);

        return parent::render();
    }
}
