import { ref } from 'vue';

const apiURL = 'https://api.coingecko.com/api/v3/';

export const useFetch = async (path: string) => {
  const data = ref(null);
  const error = ref(null);

  await fetch(apiURL + path)
    .then((res) => res.json())
    .then((json) => (data.value = json))
    .catch((err) => (error.value = err));

  return { data, error };
};
