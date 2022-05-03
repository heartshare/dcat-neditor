<?php

namespace Laradocs\DcatNeditor;

use Dcat\Admin\Extend\ServiceProvider;
use Dcat\Admin\Admin;
use Dcat\Admin\Form;
use Laradocs\DcatNeditor\Form\Neditor;

class DcatNeditorServiceProvider extends ServiceProvider
{
	protected $js = [
        //
    ];
	protected $css = [
		//
	];

	public function register()
	{
		//
	}

	public function init()
	{
		parent::init();

        Admin::booting(function () {
            Form::extend('neditor', Neditor::class);
        });
	}

	public function settingForm()
	{
		return new Setting($this);
	}
}
