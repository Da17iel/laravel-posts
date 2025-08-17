<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Posts',
        href: '/posts',
    },
];

defineProps({
    posts: Array
});

</script>

<template>
    <Head title="Posts" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="min-h-screen bg-gray-50 dark:bg-black text-gray-900 dark:text-gray-100">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold mb-8 text-center">Latest Posts</h1>

                <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <Link
                        v-for="post in posts"
                        :key="post.id"
                        :href="route('posts.show', post.id)"
                        class="relative group rounded-2xl overflow-hidden flex flex-col
                             bg-white/70 dark:bg-gray-800/70 backdrop-blur-xl shadow-md
                             transition-all duration-300 ease-out cursor-pointer
                             hover:shadow-2xl hover:scale-[1.02]"
                    >
                        <!-- Glow highlight on hover -->
                        <div
                            class="absolute inset-0 opacity-0 group-hover:opacity-100
                   transition duration-500 pointer-events-none
                   bg-gradient-to-tr from-indigo-400/20 via-transparent to-purple-400/20"
                        ></div>

                        <!-- Header Image -->
                        <img
                            :src="post.image_url"
                            alt="Post image"
                            class="w-full h-48 object-cover transform transition-transform duration-500 group-hover:scale-105"
                        />

                        <!-- Content -->
                        <div class="p-5 flex flex-col flex-1 relative z-10">
                            <h2 class="text-xl font-semibold mb-2 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition">
                                {{ post.title }}
                            </h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                                By {{ post.user.name }} · {{ new Date(post.created_at).toLocaleDateString() }}
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 flex-1 line-clamp-3">
                                {{ post.body }}
                            </p>
                        </div>
                    </Link>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
