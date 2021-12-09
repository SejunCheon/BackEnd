<template>
    <div>
        <v-app>
            <Main />
            <v-card>
                <v-row>
                    <v-col v-for="post in posts" :key="post.id" cols="1">
                        <v-img
                            id="img"
                            :src="'/storage/images/' + post.image"
                            :lazy-src="'/storage/images/' + post.image"
                            aspect-ratio="1"
                            class="grey lighten-2"
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
    data() {},
};
</script>

<style>
/* #img {
    width: 150px;
    height: 100px;
} */
</style>
