<template>
    <div>
        <v-app>
            <Main />
            <v-card class="container" width="70%" height="70%">
                <v-row>
                    <v-col
                        class="d-flex child-flex"
                        v-for="n in 9"
                        :key="n"
                        cols="4"
                    >
                        <!-- v-for="post in posts" cols="12" :key="post.id"
                        :src="'/storage/images/' + post.image" -->

                        <v-img
                            class="grey lighten-2"
                            :src="`https://picsum.photos/500/300?image=${
                                n * 5 + 10
                            }`"
                            :lazy-src="`https://picsum.photos/10/6?image=${
                                n * 5 + 10
                            }`"
                            spect-ratio="1"
                        >
                            <template v-slot:placeholder>
                                <v-row
                                    class="fill-height ma-0"
                                    align="center"
                                    justify="center"
                                >
                                    <v-progress-circular
                                        indeterminate
                                        color="grey lighten-5"
                                    ></v-progress-circular>
                                </v-row>
                            </template>
                        </v-img>
                    </v-col>
                </v-row>
            </v-card>
        </v-app>
    </div>
</template>

<script>
import Main from "@/Pages/Main";

export default {
    props: ["posts"],
    components: {
        Main,
    },
    data() {
        return {};
    },
};
</script>

<style>
* {
    box-sizing: border-box;
}

body {
    margin-top: 100px;
}
</style>
