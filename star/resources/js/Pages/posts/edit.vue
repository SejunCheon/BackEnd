<template>
    <div>
        <v-app>
            <Main>
                <v-card
                    class="mx-auto my-12 container"
                    max-width="614"
                    outlined
                >
                    <v-card class="mb-4" outlined>
                        <v-card-title
                            >{{ posts.title }}
                            {{ posts.content }}
                            <v-spacer></v-spacer>

                            <v-menu bottom right>
                                <template v-slot:activator="{ on, attrs }">
                                    <v-btn icon v-bind="attrs" v-on="on">
                                        <v-icon>mdi-dots-vertical</v-icon>
                                    </v-btn>
                                </template>

                                <v-list>
                                    <v-list-item>
                                        <v-list-item-title
                                            ><a
                                                :href="`/posts/${posts.id}/edit`"
                                                >수정
                                            </a></v-list-item-title
                                        >
                                    </v-list-item>
                                    <v-list-item>
                                        <v-list-item-title
                                            ><a
                                                :href="`/posts/${posts.id}/edit`"
                                                >수정
                                            </a></v-list-item-title
                                        >
                                    </v-list-item>
                                </v-list>
                            </v-menu>
                        </v-card-title>
                    </v-card>
                    <v-img :src="'/storage/images/' + posts.image"></v-img>

                    <v-card-text>
                        <v-row
                            align="center"
                            class="mx-0"
                            justify="space-between"
                        >
                            <v-rating
                                :value="4.5"
                                color="amber"
                                dense
                                half-increments
                                readonly
                                size="14"
                            ></v-rating>

                            <div class="grey--text ms-4">
                                {{ posts.created_at }}
                            </div>
                        </v-row>

                        <v-card-title>{{ posts.title }}</v-card-title>
                    </v-card-text>

                    <v-divider class="mx-4"></v-divider>

                    <v-card-text class="mx-4"> {{ posts.content }}</v-card-text>
                </v-card>
            </Main>
        </v-app>
    </div>
</template>

<script>
import Main from "@/Pages/Main";
export default {
    props: ["posts"],
    components: { Main },
    data() {
        return {};
    },
};
</script>
