<?php

namespace App\Http\Livewire\Back;

use Livewire\Component;
use App\Models\SocialMedia;

class SocialMediaForm extends Component
{
    public $blog_social_media;

    public $facebook, $instagram, $youtube, $web, $twitter;

    public function mount()
    {
        $this->blog_social_media = SocialMedia::find(1);
        $this->facebook = optional($this->blog_social_media)->facebook;
        $this->instagram = optional($this->blog_social_media)->instagram;
        $this->youtube = optional($this->blog_social_media)->youtube;
        $this->twitter = optional($this->blog_social_media)->twitter;
        $this->web = optional($this->blog_social_media)->web;
    }
    public function UpdateBlogSocialMedia()
    {
        $data = [
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'youtube' => $this->youtube,
            'twitter' => $this->twitter,
            'web' => $this->web,
        ];

        $this->blog_social_media = SocialMedia::updateOrCreate(['id' => 1], $data);

        if ($this->blog_social_media->wasRecentlyCreated) {
            flash()->addSuccess('Social media has been successfully created.');
        } else {
            flash()->addSuccess('Social media has been successfully updated.');
        }
    }
    public function render()
    {
        return view('livewire.back.social-media-form');
    }
}
