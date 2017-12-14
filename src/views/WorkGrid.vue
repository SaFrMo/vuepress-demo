<template>

    <main class="work-grid">

        <h1 v-html="$store.getters.post.title"/>

        <article v-if="$store.getters.post" v-html="$store.getters.post.content"/>

        <ul>
            <li v-for="child in $store.getters.post.related.children" :key="child.id">
                <router-link :to="child.relativePath">
                    <h2 v-html="child.title"/>
                </router-link>
            </li>
        </ul>

    </main>

</template>

<style lang="scss">
    @import 'src/styles/vars';

    .work-grid {
        padding: 0 $desktop-padding;
    }
</style>
