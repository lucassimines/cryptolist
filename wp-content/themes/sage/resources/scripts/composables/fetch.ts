import { ref, type Ref } from 'vue';

const baseURL = 'https://api.coingecko.com/api/v3';

export const useFetch = async <TResponse>(path: string) => {
  const data = ref(null) as Ref<TResponse>;
  const error = ref(null);

  await fetch(`${baseURL}/${path}`)
    .then((res) =>
      res.json().then(
        (json) => (res.ok ? json : Promise.reject(json)),
        (err) => Promise.reject({ error: { id: 'api_error', reason: err } })
      )
    )
    .then((json) => (data.value = json))
    .catch((err) => (error.value = err));

  return { data, error };
};
