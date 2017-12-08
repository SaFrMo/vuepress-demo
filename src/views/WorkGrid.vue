<template>

    <main class="work-grid">

        <article v-if="$store.getters.post" v-html="$store.getters.post.content"/>

    </main>

</template>
