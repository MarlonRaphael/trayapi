<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSaleRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get custom attributes for validator errors.
   *
   * @return array
   */
  public function attributes()
  {
    return [
        'price' => 'valor',
        'user_id' => 'vendedor',
    ];
  }

  /**
   * Prepare the data for validation.
   *
   * @return void
   */
  protected function prepareForValidation()
  {
    $this->merge([
        'price' => $this->sanetize($this->price),
    ]);
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
        'price' => ['required', 'numeric', 'integer', 'min:0'],
        'user_id' => ['required', 'numeric', 'integer', 'exists:users,id'],
    ];
  }

  /**
   * @param $value
   * @return mixed|string
   */
  private function sanetize($value = '')
  {
    $search = ['.', ',', '-', '/', '\\', '#', '(', ')', ' '];
    $value = trim(ltrim(rtrim($value)));
    $value = str_replace($search, '', $value);
    return $value;
  }
}
