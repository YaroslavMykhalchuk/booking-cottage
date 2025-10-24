<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormContactRequest;
use App\Services\FormService;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function __construct(FormService $formService)
    {
        $this->formService = $formService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function sendForm(FormContactRequest $request)
    {
        $this->formService->contactUsForm($request->validated());

        return response()->json([
            'success' => 'Form successfully sent!',
        ]);
    }
}
