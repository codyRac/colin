<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { computed, defineProps } from 'vue';


const props = defineProps({
    content: Array // Receive content from the controller
});

const contentMap = computed(() => {
    return props.content.reduce((acc, item) => {
        acc[item.slug] = item.copy;
        return acc;
    }, {});
});

const form = useForm({
    name: '',
    email: '',
    phone: ''
});

// Handle form submission
const submitForm = () => {
    form.post('/contact', {
        onSuccess: () => {
            alert('Your interest form has been submitted successfully.');
            form.reset();
        }
    });
};

const siteUrl = computed(() => window.location.href);
const ogImage = computed(() => `${window.location.origin}/img/COLINM-t.jpg`);
const ogTitle = "JCM Fitness";
const ogDescription = "Personalized training programs tailored just for you. Get started with JCM Fitness today!";


</script>

<template>
    <Head :title="ogTitle">
        <!-- Open Graph Meta Tags -->


        <!-- Preconnect for Fonts -->
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div class="w-full min-h-screen bg-cover bg-no-repeat" style="background-image: url('https://personalluerra.sfo3.digitaloceanspaces.com/Colin/Img/COLINM206.jpg');">
        <header class="not-has-[nav]:hidden mb-6 w-full  text-sm ">
            <nav class="flex p-3 justify-end gap-4">
                <a
                    v-if="$page.props.auth.user && $page.props.auth.user.roles.includes('admin')"
                    href="/admin"
                    class="inline-block right-0 rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] text-[#EDEDEC] hover:border-[#3E3E3A]"
                >
                    Admin
                </a>
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                        class="inline-block right-0 rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] text-[#EDEDEC] hover:border-[#3E3E3A]"
                >
                    Dashboard
                </Link>


                <template v-else>
                    <Link
                        :href="route('login')"
                        class="inline-block right-0 rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] text-[#EDEDEC] hover:border-[#3E3E3A]"
                    >
                        Log in
                    </Link>
                    <Link
                        :href="route('register')"
                        class="inline-block right-0 rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] border-[#3E3E3A] text-[#EDEDEC] hover:border-[#62605b]"
                    >
                        Register
                    </Link>
                </template>
            </nav>
        </header>
    <div class="" >
        <main class="w-full">
            <!-- Full-width title section -->
            <div  class="w-full md:text-left text-center text-custom-light text-3xl p-10 animate-slide-in-lr">
               Colin McCalla
               <div class="text-custom-blue text-xl">
                   Personal Trainer
               </div>
            </div>
            <div  class="w-full text-center text-custom-light text-8xl p-10 animate-slide-in-rl">
                JCM Fitness
                <div class="text-custom-blue text-5xl my-10">
                    {{ contentMap.main_headline }}

                </div>
            </div>

            <!-- Diagonal blue section -->
            <!-- <div class="relative w-full">
                <div class="absolute top-0 left-0 w-full h-32 bg-custom-blue clip-diagonal animate-slide-in-rl"></div>
            </div> -->

            <!-- Content sections -->
            <div class="w-full text-center py-10">
                <div class="grid md:grid-cols-3 grid-cols-1 gap-3 text-custom-light mx-3 text-3xl">

                    <a role="button" href="#contact"
                        class="p-3 border  border-custom-blue  rounded hover:bg-custom-main  animate-slide-in-lr">
                        Contact
                    </a>
                    <a role="button" href="#about" class="p-3 border border-custom-blue rounded hover:bg-custom-main animate-slide-in-up">About</a>
                    <a role="button"  href="#service" class="p-3 border border-custom-blue  rounded hover:bg-custom-main  animate-slide-in-rl">Services</a>


                </div>
            </div>
        </main>
    </div>

        <div class="h-14.5 hidden lg:block"></div>
    </div>
     <div class="md:p-10 my-10" id="contact">
        <div class="container mx-auto">
            <div class="text-5xl md:text-8xl text-center">Contact/Interest Form</div>
                <div class="text-3xl text-center my-10 p-3">
                    <div class="md:w-1/2 mx-auto">
                        <form @submit.prevent="submitForm" class="border p-3 border-custom-blue rounded">
                            <div>
                                <Label>Name</Label>
                                <Input v-model="form.name" placeholder="Jane Doe" type="text" required />
                            </div>
                            <div>
                                <Label>Email</Label>
                                <Input v-model="form.email" placeholder="jane.doe@gmail.com" type="email" required />
                            </div>
                            <div>
                                <Label>Phone</Label>
                                <Input v-model="form.phone" placeholder="555-555-5555" type="tel" required />
                            </div>
                            <div class="mt-2">
                                <Button type="submit" :disabled="form.processing">Submit</Button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full min-h-screen bg-cover flex items-center justify-center text-center"
        style="background-image: url('https://personalluerra.sfo3.digitaloceanspaces.com/Colin/Img/COLINM242.jpg');">

        <div class="text-5xl md:text-8xl text-custom-main p-10">
            {{ contentMap.first_headline }}
        </div>
    </div>

    <div class="md:p-10 my-10" id="about">
        <div class="container mx-auto">
            <div class="text-5xl md:text-8xl text-center ">
                About
            </div>
            <div class="text-3xl text-center my-10 p-3">
                <div class="md:w-1/2 mx-auto">
                    {{ contentMap.about }}
                </div>
            </div>
        </div>
    </div>

    <div class="w-full min-h-screen bg-cover  flex items-center justify-center text-center"
        style="background-image: url('https://personalluerra.sfo3.digitaloceanspaces.com/Colin/Img/COLINM152.jpg');">

        <div class="text-5xl md:text-8xl text-custom-main p-10">
            {{ contentMap.second_headline }}
        </div>
    </div>

    <div class="md:p-10 my-10" id="service">
        <div class="container mx-auto">
        <div class="text-5xl md:text-8xl text-center ">
            Services

        </div>

         <div class="text-3xl text-center my-10 p-3">
            ONLINE PERSONAL TRAINING
            </div>
            <div class="md:w-1/2 mx-auto px-3">
            <ul class="list-disc text-2xl">
                <li>{{ contentMap.service_1 }}</li>
                <li>{{ contentMap.service_2 }}</li>
                <li>{{ contentMap.service_3 }}</li>
                <li>{{ contentMap.service_4 }}</li>
                <li>{{ contentMap.service_5 }}</li>
            </ul>


    </div>
    </div>
    </div>
</template>
