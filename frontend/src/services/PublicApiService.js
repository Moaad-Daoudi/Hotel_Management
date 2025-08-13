import api from './api';

class PublicApiService {
    /**
     * @param {object} filters { page, city, rating }
     * @returns {Promise<object>} The paginated hotel list.
     */
    fetchHotels(filters) {
        // Logic:
        // 1. GET from '/api/public/hotels' with `filters` as query parameters.
        return api.get('/public/hotels', { params: filters });
    }

    /**
     * @param {string} hotelSlug
     * @returns {Promise<object>} The full hotel details.
     */
    fetchHotelDetails(hotelSlug) {
        // Logic:
        // 1. GET from `/api/public/hotels/${hotelSlug}`.
        return api.get(`/public/hotels/${hotelSlug}`);
    }

    /**
     * @param {string} hotelSlug
     * @param {object} searchParams { check_in_date, check_out_date, adults }
     * @returns {Promise<object>} List of available room types.
     */
    checkAvailability(hotelSlug, searchParams) {
        // Logic:
        // 1. GET from `/api/public/hotels/${hotelSlug}/availability` with `searchParams`.
        return api.get(`/public/hotels/${hotelSlug}/availability`, { params: searchParams });
    }

    /**
     * @param {object} bookingData
     * @returns {Promise<object>} The newly created booking confirmation.
     */
    createBooking(bookingData) {
        // Logic:
        // 1. POST to '/api/public/bookings' with the bookingData.
        return api.post('/public/bookings', bookingData);
    }
}

export default new PublicApiService();
