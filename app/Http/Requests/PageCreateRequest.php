<?php
namespace App\Http\Requests;

use Carbon\Carbon;

class PageCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'subtitle' => 'required',
            'content_raw' => 'required',
            'published_at' => 'required',
            'layout' => 'required',
        ];
    }

    /**
     * Return the fields and values to create a new post from
     */
    public function pageFillData()
    {
        $published_at = new Carbon(
            $this->publish_date.' '.$this->publish_time
        );
        return [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'page_image' => $this->page_image,
            'content_raw' => $this->get('content_raw'),
            'meta_description' => $this->meta_description,
            'is_draft' => (bool)$this->is_draft,
            'published_at' => $published_at,
            'layout' => $this->layout,
        ];
    }
}
