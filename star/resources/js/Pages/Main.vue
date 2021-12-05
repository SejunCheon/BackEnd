<template>
    <div id="App">
        <v-app>
            <v-app-bar app color="blue" elevation="4" outlined dark absolute>
                <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>
                <v-toolbar-title
                    ><div class="titleName">
                        <a href="/">Outstargram</a>
                    </div></v-toolbar-title
                >
                <div class="title">
                    <v-col cols="5" sm="5">
                        <v-textarea
                            class="text"
                            rows="1"
                            prepend-icon="mdi-magnify"
                        ></v-textarea>
                    </v-col>
                </div>
                <v-btn icon href="/dashboard">
                    <v-icon>{{ icon.mdiAccount }}</v-icon>
                </v-btn>
            </v-app-bar>

            <v-navigation-drawer v-model="drawer" absolute temporary>
                <v-list-item>
                    <v-list-item-content>
                        <v-list-item-title class="text-h6">
                            목록
                        </v-list-item-title>
                        <v-list-item-subtitle> subtext </v-list-item-subtitle>
                    </v-list-item-content>
                </v-list-item>

                <v-divider></v-divider>

                <v-list dense nav>
                    <v-list-item v-for="item in items" :key="item.title" link>
                        <v-list-item-icon>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-item-icon>

                        <v-list-item-content>
                            <v-list-item-title>{{
                                item.title
                            }}</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list>
            </v-navigation-drawer>

            <!-- Sizes your content based upon application components -->
            <v-main>
                <div>
                    <a>Hello, World</a>
                    <Link href="">Home</Link>
                </div>
                <!-- Provides the application the proper gutter -->
                <v-container fluid>
                    <!-- If using vue-router -->
                    <router-view></router-view>
                </v-container>
            </v-main>

            <v-footer app>
                <!-- -->
            </v-footer>
        </v-app>
    </div>
</template>

<script>
import { mdiAccount } from "@mdi/js";

export default {
    data() {
        return {
            drawer: false, // 사이드 바 활성화
            icon: { mdiAccount },
            items: [
                { title: "Dashboard", icon: "mdi-view-dashboard" },
                { title: "Photos", icon: "mdi-image" },
                { title: "About", icon: "mdi-help-box" },
            ],
            right: null,
        };
    },
    methods: {
        change() {
            this.name = "카마도 예승재";
        },
    },
    computed: {
        divClasses() {
            return {
                red: this.attachRed,
                darkblue: !this.attachRed,
            };
        },
    },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Sacramento&display=swap");

* {
    box-sizing: border-box;
}

.title {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-grow: 1;
}

.titleName a {
    font-family: "Sacramento", cursive;
    font-size: 35px;
    color: white;
}

.text {
    align-items: center;
}
</style>
