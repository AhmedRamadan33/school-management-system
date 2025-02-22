<div>
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif

        @if($show_table)
            @include('livewire.parent.Table')
        @else
            <div class="stepwizard">
                <div class="stepwizard-row setup-panel">
                    <div class="stepwizard-step">
                        <a href="#step-1" type="button"
                           class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                        <p>Step1</p>
                    </div>
                    <div class="stepwizard-step">
                        <a href="#step-2" type="button"
                           class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                           <p>Step2</p>
                        </div>
                    <div class="stepwizard-step">
                        <a href="#step-3" type="button"
                           class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                           disabled="disabled">3</a>
                           <p>Step3</p>
                        </div>
                </div>
            </div>

    @include('livewire.parent.Father_Form')

    @include('livewire.parent.Mother_Form')


        <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
                 @if ($currentStep != 3)
                <div style="display: none" class="row setup-content" id="step-3">
                    @endif

                    <div class="col-xs-12">
                        <div class="col-md-12"><br>
                            <label style="color: red">Attachments</label>
                            <div class="form-group">
                                <input type="file" wire:model="photos" accept="image/*" multiple>
                            </div>
                            <br>

                            <input type="hidden" wire:model="parent_id">

                            <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right ml-2" type="button"
                                    wire:click="back(2)">Back</button>

                            @if($updateMode)
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="submitForm_edit"
                                        type="button">Finish
                                </button>
                            @else
                                <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="save"
                                        type="button">Finish</button>
                            @endif

                        </div>
                    </div>
                </div>

            @endif

        </div>
