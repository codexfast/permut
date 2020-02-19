import Index from './components/user/pages/index.vue';
import Register from './components/user/pages/auth/Register.vue';
import Login from './components/user/pages/auth/Login.vue';
import Recover from './components/user/pages/auth/Recover.vue';
import ResetPassword from './components/user/pages/auth/ResetPassword.vue';
import VerifyEmail from './components/user/pages/auth/VerifyEmail.vue';
import NotFound from './components/user/pages/NotFound.vue';



const progress = {
    func: [
        { call: 'color', modifier: 'temp', argument: '#238238' },
        { call: 'fail', modifier: 'temp', argument: '#6e0000' },
        { call: 'location', modifier: 'temp', argument: 'top' },
        { call: 'transition', modifier: 'temp', argument: { speed: '1.5s', opacity: '0.6s', termination: 400 } }
    ]
}
const PageName = "Permut"
const MainURL = location.host;
const FacebookURL = 'https://www.facebook.com/permut';
const MainImage = 'http://' + location.host + '/img/placeholder_image.png';
const MainTitle = 'Default';
const MainKeys = 'Permutas';
const MainColor = "#52D18D"
const MainDescription = 'Default';
const MainUserName = "@permut"
const MainLocale = "pt_BR";
const metaHelper = [
    ////
    {
        name: 'theme-color',
        content: MainColor
    },
    {
        name: 'msapplication-navbutton-color',
        content: MainColor
    },
    {
        name: 'apple-mobile-web-app-capable',
        content: 'yes'
    },
    {
        name: 'apple-mobile-web-app-status-bar-style',
        content: MainColor
    },
    {
        property: 'keywords',
        content: MainKeys
    },
    {
        property: 'og:locale',
        content: MainLocale
    },
    {
        property: 'og:type',
        content: 'article'
    },
    {
        property: 'og:site_name',
        content: PageName
    },
    {
        property: 'article:publisher',
        content: FacebookURL
    },
    {
        name: 'twitter:creator',
        content: MainUserName
    },
    {
        name: 'twitter:site',
        content: MainUserName
    },
    {
        name: 'twitter:card',
        content: 'summary_large_image'
    },
    {
        name: 'description',
        content: MainDescription
    },
    {
        property: 'og:description',
        content: MainDescription
    },
    {
        property: 'og:url',
        content: MainURL
    },
    {
        property: 'og:image',
        content: MainImage
    },
    {
        property: 'og:image:secure_url',
        content: MainImage
    },

    {
        name: 'twitter:description',
        content: MainDescription
    },

    {
        name: 'twitter:image',
        content: MainImage
    },
]

export const routes = [
    {
        path: '/',
        component: Index,
        meta: {
            requiresAuth: true,
            title: PageName + ' - ' + MainTitle,
            metaTags: [
                ...metaHelper,
                {
                    property: 'og:title',
                    content: PageName + ' - ' + MainTitle,
                },
                {
                    name: 'twitter:title',
                    content: PageName + ' - ' + MainTitle,
                },
            ],
            progress
        }
    },


    {
        path: '/404',
        component: NotFound,
        meta: {
            title: PageName + ' - Página não encontrada',
            metaTags: [
                ...metaHelper,
                {
                    property: 'og:title',
                    content: PageName + " - Página não encontrada"
                },
                {
                    name: 'twitter:title',
                    content: PageName + " - Página não encontrada"
                },
            ],
            progress
        }
    },
    {
        path: '*',
        redirect: '/404',
        meta: {
            progress
        }
    },
    {
        path: '/login',
        component: Login,
        meta: {
            title: PageName + " - Login",
            metaTags: [
                ...metaHelper,
                {
                    property: 'og:title',
                    content: PageName + " - Login"
                },
                {
                    name: 'twitter:title',
                    content: PageName + " - Login"
                },
            ],
            progress
        }
    },


    {
        path: '/reset-password',
        name: 'reset-password',
        component: Recover,
        meta: {
            title: PageName + " - Recuperar conta",
            metaTags: [
                ...metaHelper,
                {
                    property: 'og:title',
                    content: PageName + " - Recuperar conta"
                },
                {
                    name: 'twitter:title',
                    content: PageName + " - Recuperar conta"
                },
            ],
            progress
        }
    },
    {
        path: '/reset-password/:token',
        name: 'reset-password-form',
        component: ResetPassword,
        meta: {
            title: PageName + " - Recuperar conta",
            metaTags: [
                ...metaHelper,
                {
                    property: 'og:title',
                    content: PageName + " - Recuperar conta"
                },
                {
                    name: 'twitter:title',
                    content: PageName + " - Recuperar conta"
                },
            ],
            progress
        }
    },
    {
        path: '/verify-email',
        name: 'verify-email',
        component: VerifyEmail,
        meta: {
            requiresAuth: true,
            title: PageName + ' Verificar e-mail',
            metaTags: [
                ...metaHelper,
                {
                    property: 'og:title',
                    content: PageName + " - Verificar e-mail"
                },
                {
                    name: 'twitter:title',
                    content: PageName + " - Verificar e-mail"
                },
            ],
            progress
        }
    },
    {
        path: '/register',
        component: Register,
        meta: {
            title: PageName + " - Cadastrar-se",
            metaTags: [
                ...metaHelper,
                {
                    property: 'og:title',
                    content: PageName + " - Cadastrar-se"
                },
                {
                    name: 'twitter:title',
                    content: PageName + " - Cadastrar-se"
                },
            ],
            progress
        }
    },

];