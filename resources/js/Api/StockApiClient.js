export {StockApiClient}

class StockApiClient {
    async getData(source, parameters)
    {
        const query = new URLSearchParams()

        Object.entries(parameters).forEach(([key, value]) => {
            if (value !== null && value !== undefined) {
                query.set(key, value)
            }
        })

        const response = await fetch(`/api/${source}?${query.toString()}`, {
            headers: {
                'Accept': 'application/json',
            },
        })

        if (!response.ok) {
            throw new Error(`Stock API request failed with status ${response.status}`)
        }

        return response.json()
    }
}
