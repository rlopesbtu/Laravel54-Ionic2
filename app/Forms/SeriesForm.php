<?php

namespace CodeFlix\Forms;

use Kris\LaravelFormBuilder\Form;

class SeriesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('title', 'text')
            ->add('description', 'textarea');
    }
}
