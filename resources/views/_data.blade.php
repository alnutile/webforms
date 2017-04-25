@foreach($webforms as $webform_key => $webform)

    @if($webform['field_element'])

        @if($webform['field_element'] == 'input')
            <div class="form-group">
                <label for="{{ $webform_key }}">{{ $webform['title'] }}</label>
                <input type="text"
                       class="form-control"
                       name="{{ $webform_key }}"
                       value="{{ $webform['default_value'] }}">
            </div>
        @elseif($webform['field_element'] == 'textarea')
            <div class="form-group">
                <label for="{{ $webform_key }}">{{ $webform['title'] }}</label>
                <textarea class="form-control" rows="10"
                          name="{{ $webform_key }}">{{ $webform['default_value'] }}</textarea>
            </div>
        @elseif($webform['field_element'] == 'multiple_select')
            <label for="{{ $webform_key }}">{{ $webform['title'] }}</label>
            <select name="{{ $webform_key }}" class="form-control">

                @foreach($webform['values'] as $select_value => $select_label)
                    <option value="{{ $select_value }}"
                            @if($webform['default_value'] == $select_value)
                            selected
                            @endif
                    >{{ $select_label }}</option>
                @endforeach
            </select>
        @else
            {{-- hmm should maybe default to something? --}}
        @endif

    @endif

@endforeach