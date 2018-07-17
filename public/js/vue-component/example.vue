<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Eaaaaxample Component</div>

                    <div class="panel-body">
                        I'm an example component!asdfasdfadfasdfas
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    Vue.component('example', example)
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }

    new Vue({el: '#component-ex'});
</script>
