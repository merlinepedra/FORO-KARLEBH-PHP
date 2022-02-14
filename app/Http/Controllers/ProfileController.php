<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{
  public function show(Profile $profile)
  {
    return view('profile.show')->withProfile($profile);
  }

  public function edit(Profile $profile)
  {
    return view('profile.edit')->withProfile($profile);
  }

  public function update(UpdateProfileRequest $request, Profile $profile)
  {
    $this->authorize('update', $profile);

    $profile->update([
      'city' => $request->filled('city') ? $request->city : '',
      'country' => $request->filled('country') ? $request->country : '',
      'phone' => $request->filled('phone') ? $request->phone : '',
      'sex' => $request->filled('sex') ? $request->sex : '',
    ]);

    (new \App\Http\Helpers\File)->upload($request, $profile);

   return back();
 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
  }
