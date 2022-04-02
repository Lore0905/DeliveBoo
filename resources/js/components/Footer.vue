<template>
    <footer>
        <div class="container">

            <div class="row gx-2 row-cols-1 row-cols-md-2 row-cols-lg-4">

                <div class="m_col col">
                    <div class="title">
                        Scopri Deliveboo
                    </div>

                    <div class="list d-flex flex-column">
                        <div>
                            Investitori
                        </div>
                        <div>
                            Chi siamo
                        </div>
                        <div>
                            Ristoranti
                        </div>
                        <div>
                            Altro
                        </div>
                        <div>
                            Pressroom
                        </div>
                        <div>
                            Il nostro Blog
                        </div>
                        <div>
                            Programmazione
                        </div>
                        <div>
                            Design
                        </div>
                        <div>
                            Lavora con noi
                        </div>
                        <div>
                            Diventa nostro partner
                        </div>
                    </div>
                </div>

                <div class="m_col col">
                    <div class="title">
                        Note Legali
                    </div>

                    <div class="list d-flex flex-column">
                        <div>
                            Termini & Condizioni
                        </div>
                        <div>
                            Informativa sulla privacy
                        </div>
                        <div>
                            Cookies
                        </div>
                    </div>
                </div>

                <div class="m_col col">
                    <div class="title">
                        Aiuto
                    </div>

                    <div class="list d-flex flex-column">
                        <div>
                            Contatti
                        </div>
                        <div>
                            FAQ
                        </div>
                        <div>
                            Tipi di cucina
                        </div>
                    </div>
                </div>

                <div class="m_col col">
                    <div class="title">
                        Porta Deliveboo con te
                    </div>

                    <div class="list d-flex flex-column">
                        <div>
                            <i class="fab fa-apple"></i>
                            App Store
                        </div>
                        <div>
                            <i class="fab fa-google-play"></i>
                            Play Store
                        </div>
                    </div>
                </div>

            </div>

            <div class="bottom-footer">
                <div class="icons">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                </div>

                <div class="copyright">
                    <i class="fas fa-copyright"></i>
                    2022 Deliveboo
                </div>
            </div>

        </div>
    </footer>
</template>

<script>
    export default {
        name: 'Footer'
    }
</script>

<style lang="scss" scoped>
@import '../../sass/partials/_variables.scss';
@import '../../sass/partials/_generals.scss';

footer{
    background-color: #2e3333;
    color: white;

    .row{

        .m_col{
            margin: 10px 0;
            background-color: #434848;
            padding: 25px;
            border-right: 8px solid #2e3333;
            border-left: 8px solid #2e3333;

            .title{
                font-size: 20px;
                margin-bottom: 15px;
                font-weight: 600;
            }

            .list{

                div{
                    padding: 5px 0;
                    cursor: pointer;

                    &:hover{
                        color: $primary_color;
                    }
                }
            }

        }
    }

    .bottom-footer{
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 0;
        font-size: 20px;

        .icons{

            i{
                margin-right: 15px;
                cursor: pointer;
            }
        }

        .copyright{
            color: #434848;
            font-weight: 300;
        }

    }
}
</style>