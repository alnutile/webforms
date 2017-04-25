<?php


namespace Alnutile\Webforms;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class WebformsController extends BaseController
{


    public function index(Request $request) {
        try {
            $webforms = Webform::latest()->paginate(10);
            return view("webforms::index", compact('webforms'));
        } catch (\Exception $e) {
            Log::debug($e);
            return back()->withErrors(["Error getting webforms"]);
        }
    }

    public function show(Request $request, Webform $webform,  $webform_id) {
        try {
            $webforms = $webform->getWebformToShow($webform_id);
            return view("webforms::show", compact('webforms'));
        } catch (\Exception $e) {
            Log::debug($e);
            return back()->withErrors(["Error getting webforms"]);
        }
    }

    public function edit(Request $request, Webform $webform, $webform_id) {
        try {
            $webforms = $webform->getWebformToEdit($webform_id);

            return view("webforms::edit",
                ['webforms' => $webforms->data, 'webform_defaults' => $webforms->default_values]);
        } catch (\Exception $e) {
            Log::debug($e);
            return back()->withErrors(["Error creating webforms"]);
        }
    }

    public function create(Request $request, Webform $webform) {
        try {
            $webforms = $webform->getDefault();

            return view("webforms::create", ['webforms' => $webforms, 'webform_defaults' => $webforms])->with('status', "Updated Webform");
        } catch (\Exception $e) {
            Log::debug($e);
            return back()->withInput();
        }
    }

    public function update(Request $request, Webform $webform, $webform_id) {
        try {
            $webform->updateFromFormRequest($request->all(), $webform_id);

            return redirect("/webforms")->with('status', "Updated Webform");
        } catch (\Exception $e) {
            Log::debug($e);
            return back()->withInput();
        }
    }

    public function store(Request $request, Webform $webform) {
        try {
            $webform->saveNewFromFormRequest($request->all());

            return redirect("/webforms")->with('status', "Created Webform");
        } catch (\Exception $e) {
            Log::debug($e);
            return back()->withErrors(["Error saving new webforms"]);
        }
    }
}