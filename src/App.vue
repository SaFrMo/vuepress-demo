<template>
    <div :class="classes">
        <site-header/>

        <router-view/>

    </div>
</template>

<script>
    import throttle from 'lodash/throttle'
    import router from 'src/utils/router'
    import store from 'src/utils/store'
    import _kebabCase from 'lodash/kebabCase'
    import SiteHeader from 'src/components/SiteHeader.vue'

    export default {
        el: '#app',
        store,
        router,
        data () {
            return {
                winHeight: window.innerHeight,
                winWidth: window.innerWidth,
                sTop: 0
            }
        },
        components: {
            'site-header': SiteHeader
        },
        mounted () {
            window.addEventListener('resize', throttle(this.onResize, 30))
            window.addEventListener('scroll', throttle(this.onScroll, 10))
        },
        methods: {
            onResize () {
                this.winWidth = window.innerWidth
                this.winHeight = window.innerHeight

                this.$emit('throttled.resize')
            },
            onScroll () {
                this.sTop = window.pageYOffset || document.documentElement.scrollTop

                this.$emit('throttled.scroll')
            }
        },
        computed: {
            classes () {
                return [
                    'container',
                    `breakpoint-${ this.breakpoint }`,
                    { loading: this.$store.getters.loading },
                    `route-${ _kebabCase(this.$route.name) }`
                ]
            },
            breakpoint () {
                return this.winWidth >= 750 ? 'desktop' : 'mobile'
            }
        }
    }
</script>

<style lang="scss">

    // import base styles
    @import 'src/styles/base';

    .container {
        margin: 0;
    }

</style>
