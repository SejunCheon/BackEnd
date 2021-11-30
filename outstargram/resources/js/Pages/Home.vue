<template>
    <div class="menu">
        <div class="title"><a>Outstargram</a></div>
        <div class="icon">
            <svg
                aria-label="홈"
                class="_8-yf5"
                color="#262626"
                fill="#262626"
                height="24"
                role="img"
                viewBox="0 0 24 24"
                width="24"
            >
                <path
                    d="M22 23h-6.001a1 1 0 01-1-1v-5.455a2.997 2.997 0 10-5.993 0V22a1 1 0 01-1 1H2a1 1 0 01-1-1V11.543a1.002 1.002 0 01.31-.724l10-9.543a1.001 1.001 0 011.38 0l10 9.543a1.002 1.002 0 01.31.724V22a1 1 0 01-1 1z"
                ></path>
            </svg>
            <svg
                aria-label="Direct"
                class="_8-yf5"
                color="#262626"
                fill="#262626"
                height="24"
                role="img"
                viewBox="0 0 24 24"
                width="24"
            >
                <path
                    d="M22.91 2.388a.69.69 0 00-.597-.347l-20.625.002a.687.687 0 00-.482 1.178L7.26 9.16a.686.686 0 00.778.128l7.612-3.657a.723.723 0 01.937.248.688.688 0 01-.225.932l-7.144 4.52a.69.69 0 00-.3.743l2.102 8.692a.687.687 0 00.566.518.655.655 0 00.103.008.686.686 0 00.59-.337L22.903 3.08a.688.688 0 00.007-.692"
                    fill-rule="evenodd"
                ></path>
            </svg>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        Link,
    },
    props: [],
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Sacramento&display=swap");

.menu {
    padding: 16px;
    border-radius: 10px;
    display: flex;
    justify-content: space-between;
}

.title a {
    font-family: "Sacramento", cursive;
    font-size: 35px;
}
</style>
