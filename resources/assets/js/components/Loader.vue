<template>
    <div class="loader-background" :class="{'loading': loading}">
        <div class="loader-container">
            <atom-spinner
                    :animation-duration="1000"
                    :size="60"
                    :color="'#fff'"
            />
        </div>
    </div>
</template>
<!--:color="'#ff1d5e'"-->
<script>
    import {AtomSpinner} from 'epic-spinners';

    export default {
        components: {
            AtomSpinner
        },
        props: {
            loading: {
                type: Boolean,
                default: false
            }
        },
        name: "Loader"
    }
</script>

<style scoped>
    .loader-background {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 99999;
        background: #000;
        opacity: 0.5;
    }

    .loader-background.loading {
        display: block;
    }

    .loader-container {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>