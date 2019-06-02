




<template>
    <div>
        <input v-bind:name="getId()">
        {{ getId() }}
    </div>
</template>

<script>
    module.exports = {
        data : function() {
            return {
                id : 'd'
            }
        },
        methods : {
            getId : function() {
                return checkVariableIsHtmlAttribute(this.id);
            }
        }
    }
</script>
