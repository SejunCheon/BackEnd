<template>
    <app-layout>
        <div id="App">
            <v-app>
                <v-app-bar
                    app
                    color="blue"
                    elevation="4"
                    outlined
                    dark
                    absolute
                >
                    <v-app-bar-nav-icon
                        @click="drawer = true"
                    ></v-app-bar-nav-icon>
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
                    <div class="dialog">
                        <v-row justify="center">
                            <v-dialog v-model="isOpen" max-width="600px">
                                <template v-slot:activator="{ on, attrs }">
                                    <v-btn
                                        v-bind="attrs"
                                        v-on="on"
                                        @click.stop="isOpen = true"
                                        ><v-icon large>mdi-plus</v-icon></v-btn
                                    >
                                </template>
                                <v-card>
                                    <v-card-title class="cardTitle">
                                        <span class="text-h5"
                                            >새 게시물 만들기</span
                                        >
                                    </v-card-title>
                                    <v-card-text>
                                        <v-container>
                                            <form @submit.prevent="submit">
                                                <v-row>
                                                    <v-col cols="12">
                                                        <v-file-input
                                                            filled
                                                            prepend-icon="mdi-camera"
                                                            v-model="form.image"
                                                        ></v-file-input>
                                                        <progress
                                                            v-if="form.progress"
                                                            :value="
                                                                form.progress
                                                                    .percentage
                                                            "
                                                            max="100"
                                                        >
                                                            {{
                                                                form.progress
                                                                    .percentage
                                                            }}%
                                                        </progress>
                                                    </v-col>
                                                    <v-col cols="12">
                                                        <v-text-field
                                                            label="title*"
                                                            required
                                                            v-model="form.title"
                                                        ></v-text-field>
                                                    </v-col>
                                                    <v-col cols="12">
                                                        <v-text-field
                                                            label="content*"
                                                            required
                                                            v-model="
                                                                form.content
                                                            "
                                                        ></v-text-field>
                                                    </v-col>
                                                </v-row>
                                            </form>
                                        </v-container>
                                        <small>*꼭 입력하세요</small>
                                    </v-card-text>
                                    <v-card-actions>
                                        <v-spacer></v-spacer>
                                        <v-btn
                                            color="blue darken-1"
                                            text
                                            @click="isOpen = false"
                                        >
                                            Close
                                        </v-btn>
                                        <v-btn
                                            type="submit"
                                            color="blue darken-1"
                                            text
                                            @click="save"
                                            :disabled="form.processing"
                                        >
                                            Save
                                        </v-btn>
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>
                            <v-btn icon href="/user/profile">
                                <v-icon>{{ icon.mdiAccount }}</v-icon>
                            </v-btn>
                        </v-row>
                    </div>
                </v-app-bar>

                <v-navigation-drawer v-model="drawer" absolute temporary>
                    <v-list-item>
                        <v-list-item-content>
                            <v-list-item-title class="text-h6">
                                목록
                            </v-list-item-title>
                            <v-list-item-subtitle>
                                subtext
                            </v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>

                    <v-divider></v-divider>

                    <v-list dense nav>
                        <v-list-item
                            v-for="item in items"
                            :key="item.title"
                            link
                            :href="item.path"
                        >
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
    </app-layout>
</template>

<script>
import { mdiAccount } from "@mdi/js";

export default {
    props: ["post"],
    data() {
        return {
            drawer: false, // 사이드 바 활성화
            isOpen: false, // 다이얼로그 활성화
            right: null,
            icon: { mdiAccount },
            items: [
                {
                    title: "Dashboard",
                    icon: "mdi-view-dashboard",
                    path: "/dashboard",
                },
                { title: "Photos", icon: "mdi-image" },
                { title: "About", icon: "mdi-help-box" },
            ],
            form: {
                image: null,
                title: null,
                content: null,
            },
        };
    },
    methods: {
        openModal: function () {
            this.isOpen = true;
        },
        reset: function () {
            this.form = {
                image: null,
                title: null,
                content: null,
            };
        },
        save: function (data) {
            this.$inertia.post("/posts", data);
            this.reset();
            this.isOpen = false;
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

.dialog {
    display: flex;
    align-items: center;
}

.cardTitle {
    display: flex;
    justify-content: center;
}
</style>
