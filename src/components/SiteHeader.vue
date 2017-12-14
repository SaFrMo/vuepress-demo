<template>
    <header class="site-header">
        <router-link to="http://funkhaus.us" class="logo">
            <svg-image src="logo.svg"/>
        </router-link>
        <wp-menu name="Main Menu"/>
    </header>
</template>

<style lang="scss">
    @import 'src/styles/vars';

    .site-header {
        padding: $desktop-padding;

        display: flex;
        justify-content: space-between;
        align-items: center;

        .logo {
            padding: 0;
        }
        .menu {
            display: flex;

            li + li {
                margin-left: 20px;
            }
        }
    }

</style>
