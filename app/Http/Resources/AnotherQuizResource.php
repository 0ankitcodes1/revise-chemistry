<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class AnotherQuizResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'question' => $this->question,
            'correct_answer' => ($this->answer == 'A') ? (json_decode($this->options)[0]) : (
                ($this->answer == 'B') ? (json_decode($this->options)[1]) : (
                    ($this->answer == 'C') ? (json_decode($this->options)[2]) : (
                        ($this->answer == 'D') ? (json_decode($this->options)[3]) : ('empty')
                    )
                )
            ),
            'incorrect_answer' => ($this->answer == 'A') ? (Arr::except(json_decode($this->options), 0)) : (
                ($this->answer == 'B') ? (Arr::except(json_decode($this->options), 1)) : (
                    ($this->answer == 'C') ? (Arr::except(json_decode($this->options), 2)) : (
                        ($this->answer == 'D') ? (Arr::except(json_decode($this->options), 3)) : ('empty')
                    )
                )
            ),
            'options' => json_decode($this->options),
            'description' => $this->description,
            'chapter' => $this->chapter,
            'category' => $this->category,
            'subChapter' => $this->subChapter,
            'created_at' => $this->created_at,
        ];
    }
}
