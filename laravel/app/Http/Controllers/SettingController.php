<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\Setting\SettingUpdateRequest;
use App\Models\TSetting;

class SettingController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //\App\DebugClass::laravel_exe_sql_log_on();
    }

    /**
     * Undocumented function
     *
     * @param TSetting $setting
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function show(TSetting $setting)
    {
        // app()->make('curlExe')->exeCurl([]);
        //\CurlExe::exe([]);
        return view('setting.show', compact("setting"));
    }

    /**
     * Undocumented function
     *
     * @param TSetting $setting
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit(TSetting $setting)
    {
        return view('setting.edit', compact("setting"));
    }

    /**
     * @param SettingUpdateRequest $request
     * @param TSetting $setting
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SettingUpdateRequest $request, TSetting $setting)
    {
        $setting->update($request->validated());
        if (intval($request->isMakeToken()))
        {
            auth()->user()->forceFill(['api_token' => Str::random(60)])->save();
        }
        return redirect()->route("setting.show", $setting->id);
    }
}
