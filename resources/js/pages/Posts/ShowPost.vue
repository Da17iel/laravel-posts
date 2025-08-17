<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

const props = defineProps({
    post: Object
});

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Posts',
        href: '/posts',
    },
    {
        title: 'Single Post: ' + props.post.title,
        href: route('posts.show', props.post.id),
    },
];

</script>

<template>
    <Head :title="post.title" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="min-h-screen bg-gray-50 dark:bg-black text-gray-900 dark:text-gray-100">
            <!-- Header image -->
            <div class="w-full h-72 sm:h-96 overflow-hidden">
                <img
                    :src="post.image_url"
                    alt="Post header"
                    class="w-full h-full object-cover transform transition-transform duration-700 hover:scale-105"
                />
            </div>

            <!-- Content section -->
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <h1 class="text-4xl font-bold mb-4">{{ post.title }}</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-8">
                    By {{ post.user.name }} · {{ new Date(post.created_at).toLocaleDateString() }}
                </p>

                <div class="prose prose-lg dark:prose-invert max-w-none leading-relaxed">
                    <p>{{ post.content }}</p>
                </div>

                <!-- Back button -->
                <div class="mt-12">
                    <Link
                        :href="route('posts.index')"
                        class="inline-block px-6 py-2 rounded-full bg-indigo-600 text-white font-medium
                 shadow-md hover:shadow-lg hover:bg-indigo-700
                 transition-all duration-300 ease-out"
                    >
                        ← Back to Posts
                    </Link>
                </div>
            </div>
        </div>
    </AppLayout>


</template>

<style scoped>

</style>
