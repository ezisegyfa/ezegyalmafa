<?php
    if (isset($id) && $id)
        $idAttribute = 'id=' . $id;
    else
        $idAttribute = '';
?>
<template>
    <div class="container">
        <div class="row justify-content-center">
            <form {{ $idAttribute }} method="POST" action="{{ $route }}" class="w-100">
                @csrf

                @foreach ($formInfos as $formInfo)
                    @component('layouts.components.form.formInputComponent', [
                        'formInfo' => $formInfo,
                        'style' => $style
                    ])
                    @endcomponent
                @endforeach

                @component('layouts.components.form.formButton', [
                    'sendButtonTitle' => $sendButtonTitle ?? 'Send',
                    'style' => $style ?? 'card'
                ])
                @endcomponent
            </form>
        </div>
    </div>
</template>

<script>
    module.exports = {
        data : function() {
            return {
                id : 
            }
        }
    }
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
