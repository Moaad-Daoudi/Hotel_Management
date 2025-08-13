import { defineStore } from 'pinia';
// import PublicApiService from '@/services/PublicApiService';

export const useBookingProcessStore = defineStore('bookingProcess', {
    state: () => ({
        hotels: [],
        pagination: {},
        currentHotel: null,
        availableRoomTypes: [],
        isLoading: false,
    }),
    actions: {
        // async searchHotels(filters) {
            // Logic:
            // 1. Set `this.isLoading = true;`.
            // 2. In a `try...finally` block:
            //    a. Call `PublicApiService.fetchHotels(filters)`.
            //    b. On success, commit results: `this.hotels = response.data.data;` and `this.pagination = response.data;`.
            // 3. In `finally`, set `this.isLoading = false;`.
        // },

        // async loadHotelDetails(hotelSlug) {
            // Logic:
            // 1. Set `this.isLoading = true;`.
            // 2. In a `try...finally` block:
            //    a. Call `PublicApiService.fetchHotelDetails(hotelSlug)`.
            //    b. Commit result: `this.currentHotel = response.data;`.
            // 3. In `finally`, set `this.isLoading = false;`.
        },

        // async findAvailableRooms(hotelSlug, searchParams) {
            // Logic:
            // 1. Set `this.isLoading = true;`.
            // 2. In a `try...finally` block:
            //    a. Call `PublicApiService.checkAvailability(hotelSlug, searchParams)`.
            //    b. Commit result: `this.availableRoomTypes = response.data;`.
            // 3. In `finally`, set `this.isLoading = false;`.
        // },

        // async submitBooking(bookingData) {
            // Logic:
            // 1. Set `this.isLoading = true;`.
            // 2. Call `PublicApiService.createBooking(bookingData)`.
            // 3. This action returns the promise. The component will handle success (redirect) or failure (show error).
            // 4. In `finally`, set `this.isLoading = false;`.
        // },
});
