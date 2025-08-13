import { defineStore } from 'pinia';
// import GuestApiService from '@/services/GuestApiService';

export const useGuestDashboardStore = defineStore('guestDashboard', {
    state: () => ({
        myBookings: [],
        isLoading: false,
    }),
    actions: {
        async loadMyBookings() {
            // Logic:
            // 1. Set `this.isLoading = true;`.
            // 2. In a `try...finally` block:
            //    a. Call `GuestApiService.fetchMyBookings()`.
            //    b. Commit result to `this.myBookings`.
            // 3. In `finally`, set `this.isLoading = false;`.
        },
    }
});
