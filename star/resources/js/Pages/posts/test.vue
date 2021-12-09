<div class="dialog">
                <v-row justify="center">
                    <v-dialog v-model="isOpen" max-width="600px">
                        <template v-slot:activator="{ on, attrs }">
                            <v-icon
                                dark
                                class="mx-2"
                                v-bind="attrs"
                                v-on="on"
                                @click.stop="isOpen = true"
                                >mdi-plus</v-icon
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
                                        <v-row>
                                            <v-col cols="12">
                                                <v-file-input
                                                    filled
                                                    prepend-icon="mdi-camera"
                                                ></v-file-input>
                                            </v-col>
                                            <v-col cols="12">
                                                <v-text-field
                                                    label="title*"
                                                ></v-text-field>
                                            </v-col>
                                            <v-col cols="12">
                                                <v-text-field
                                                    label="content*"
                                                    v-model="form.content"
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                    <small>*꼭 입력하세요</small>
                                </v-card-text>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                        color="blue darken-1"
                                        text
                                    >
                                        Close
                                    </v-btn>
                                    <v-btn
                                        type="submit"
                                        color="blue darken-1"
                                        text
                                    >
                                        Save
                                    </v-btn>
                                   
                                </v-card-actions>
                            </v-card>
                    </v-dialog>