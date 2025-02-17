@if ($currentStep != 1)
    <div style="display: none" class="row setup-content" id="step-1">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <br>
        <div class="form-row">
            <div class="col">
                <label for="title">Email</label>
                <input type="email" wire:model="email" class="form-control">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            @if ($updateMode == false)
                <div class="col">
                    <label for="title">Password</label>
                    <input type="password" wire:model="password" class="form-control">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            @endif

        </div>

        <div class="form-row">
            <div class="col">
                <label for="title"> Father Name</label>
                <input type="text" wire:model="father_name" class="form-control">
                @error('father_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="title">Father Job</label>
                <input type="text" wire:model="father_job" class="form-control">
                @error('father_job')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">

            <div class="col">
                <label for="title">Father National ID</label>
                <input type="text" wire:model="father_national_id" class="form-control">
                @error('father_national_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label for="title">Father Phone</label>
                <input type="text" wire:model="father_phone" class="form-control">
                @error('father_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Father Nationality'</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="father_nationality">
                    <option>Choose...</option>
                    @foreach ($Nationalities as $National)
                        <option value="{{ $National->id }}">{{ $National->name }}</option>
                    @endforeach
                </select>
                @error('father_nationality')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputState">Father Blood_Type</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="father_bloodGroup">
                    <option>Choose...</option>
                    @foreach ($Type_Bloods as $Type_Blood)
                        <option value="{{ $Type_Blood->id }}">{{ $Type_Blood->name }}</option>
                    @endforeach
                </select>
                @error('father_bloodGroup')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="inputZip">Father Religion</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="father_religion">
                    <option>Choose...</option>
                    @foreach ($Religions as $Religion)
                        <option value="{{ $Religion->id }}">{{ $Religion->name }}</option>
                    @endforeach
                </select>
                @error('father_religion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">Father Address</label>
            <textarea class="form-control" wire:model="father_address" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('father_address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        @if ($updateMode)
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit_edit"
                type="button">Next
            </button>
        @else
            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="firstStepSubmit"
                type="button">Next
            </button>
        @endif

    </div>
</div>
</div>
