<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $title ?? '' }}</div>

                <div class="card-body">
                    <form id="{{ $id ?? 'form' }}" method="POST" action="{{ $route }}">
                        @csrf

                        @foreach ($formInfos as $formInfo)
                            @component('layouts.components.extendedFormInputComponent', [
                                'formInfo' => $formInfo
                            ])
                            @endcomponent
                        @endforeach

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ $sendButtonTitle ?? 'Send' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>