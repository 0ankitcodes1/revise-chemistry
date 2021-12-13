<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\WesiteInfo;

class WebsiteSettingsLivewireComponent extends Component
{
    use WithFileUploads;

    public $file;
    public $facebook_url;
    public $twitter_url;
    public $youtube_url;
    public $instagram_url;
    public $contact_header;
    public $about_us;
    public $why_choose_us;
    public $what_we_offer;
    public $android_url;
    public $apple_url;
    public $about_file;
    public $our_vision;

    public function mount() {
        $page = DB::table('website_infos')->get();
        $this->facebook_url = $page[1]->value;
        $this->instagram_url = $page[2]->value;
        $this->youtube_url = $page[3]->value;
        $this->twitter_url = $page[4]->value;
        $this->contact_header = $page[5]->value;
        $this->about_us = $page[6]->value;
        $this->why_choose_us = $page[7]->value;
        $this->what_we_offer = $page[8]->value;
        $this->android_url = $page[9]->value;
        $this->apple_url = $page[10]->value;
        $this->our_vision = $page[12]->value;
    }

    protected $rules = [
        'facebook_url' => 'nullable|max:255',
        'instagram_url' => 'nullable|max:255',
        'youtube_url' => 'nullable|max:255',
        'twitter_url' => 'nullable|max:255',
        'contact_header' => 'nullable|max:255',
        'file' => 'mimes:jpeg,jpg,png,gif|nullable|max:10000',
        'about_us' => 'nullable|max:4000000',
        'why_choose_us' => 'nullable|max:4000000',
        'what_we_offer' => 'nullable|max:4000000',
        'android_url' => 'nullable|max:255',
        'apple_url' => 'nullable|max:255',
        'about_file' => 'mimes:mp4,mov,miv,ogg|nullable|max:100000',
        'our_vision' => 'nullable|max:4000000',
    ];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        if(!is_null($this->file)) {
            $path = $this->file->store('images', 'custom');
            $path = route('home').'/resources'.'/'.$path;
            DB::table('website_infos')->where('id', 1)->update(['value' => $path]);
        }
        if (!is_null($this->facebook_url)) {
            DB::table('website_infos')->where('id', 2)->update(['value' => $this->facebook_url]);
        }
        if (!is_null($this->instagram_url)) {
            DB::table('website_infos')->where('id', 3)->update(['value' => $this->instagram_url]);
        }
        if (!is_null($this->youtube_url)) {
            DB::table('website_infos')->where('id', 4)->update(['value' => $this->youtube_url]);
        }
        if (!is_null($this->twitter_url)) {
            DB::table('website_infos')->where('id', 5)->update(['value' => $this->twitter_url]);
        }
        if (!is_null($this->contact_header)) {
            DB::table('website_infos')->where('id', 6)->update(['value' => $this->contact_header]);
        }
        if (!is_null($this->about_us)) {
            DB::table('website_infos')->where('id', 7)->update(['value' => $this->about_us]);
        }
        if (!is_null($this->why_choose_us)) {
            DB::table('website_infos')->where('id', 8)->update(['value' => $this->why_choose_us]);
        }
        if (!is_null($this->what_we_offer)) {
            DB::table('website_infos')->where('id', 9)->update(['value' => $this->what_we_offer]);
        }
        if (!is_null($this->android_url)) {
            DB::table('website_infos')->where('id', 11)->update(['value' => $this->android_url]);
        }
        if (!is_null($this->apple_url)) {
            DB::table('website_infos')->where('id', 12)->update(['value' => $this->apple_url]);
        }
        if(!is_null($this->about_file)) {
            $path = $this->about_file->store('videos', 'custom');
            $path = route('home').'/resources'.'/'.$path;
            DB::table('website_infos')->where('id', 13)->update(['value' => $path, 'by' => $this->about_file->getMimeType()]);
        }
        if (!is_null($this->our_vision)) {
            DB::table('website_infos')->where('id', 14)->update(['value' => $this->our_vision]);
        }
        
        session()->flash('page-message', 'Website settings updated successfully');
    }

    public function render()
    {
        return view('livewire.website-settings-livewire-component');
    }
}
