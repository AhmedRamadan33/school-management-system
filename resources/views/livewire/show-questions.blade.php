<div>
    <div class="card card-statistics mb-30">
        <div class="card-body">
            <h6> {{ $data[$counter]->title }}</h6>
            @foreach (preg_split('/(-)/', $data[$counter]->answers) as $answer)
                <div class="custom-control custom-radio">
                    <input type="radio" id="customRadio{{$answer}}" name="customRadio"
                        class="custom-control-input" inh>
                    <label wire:click="nextQuestion({{$data[$counter]->id}},'{{$answer}}','{{ $data[$counter]->right_answer}}','{{ $data[$counter]->score}}')"
                    class="custom-control-label" for="customRadio{{$answer}}" >{{ $answer }}</label>
                </div>
            @endforeach
        </div>
    </div>
</div>
