<?php


namespace Alnutile\Webforms;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class Webform extends Model
{


    protected $fillable = [
        'data',
        'default_values',
    ];

    protected $casts = [
        'data' => 'json',
        'default_values' => 'json'
    ];


    public function getDefault() {
        $webform = config('webform.defaults');

        return $webform;
    }

    public function getWebformToEdit($webform_id) {
        return Webform::findOrFail($webform_id);
    }


    public function updateFromFormRequest($payload, $webform_id) {

        $webform = Webform::findOrFail($webform_id);

        $default_values = $payload['default_values'];

        if(is_string($default_values)) {
            $default_values = json_decode($default_values, true);
        }

        $data = $this->mergeFormPayloadAndDefaults($payload, $default_values);

        $webform->data              = $data;
        $webform->default_values    = $default_values;
        $webform->save();

        return $webform;
    }

    public function getWebformToShow($webform_id) {
        return Webform::findOrFail($webform_id);
    }


    public function saveNewFromFormRequest($payload) {

        $defaults = $payload['default_values'];

        $defaults = json_decode($defaults, true);

        unset($payload['default_values']);

        $data = $this->mergeFormPayloadAndDefaults($payload, $defaults);

        $webform = new Webform();
        $webform->data = $data;
        $webform->default_values = $defaults;

        $webform->save();

        return $webform;
    }

    public function mergeFormPayloadAndDefaults($payload, $defaults) {
        unset($payload['_token']);
        unset($payload['submit']);

        foreach($defaults as $default_key => $value) {
            if(isset($payload[$default_key])) {
                $defaults[$default_key]['default_value'] = $payload[$default_key];
            }
        }

        return $defaults;
    }
}