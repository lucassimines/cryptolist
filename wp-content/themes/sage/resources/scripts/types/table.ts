export enum SortDirection {
  Default = '',
  Asc = 'asc',
  Desc = 'desc'
}

interface TableColum {
  label: string;
  name: string;
}

export const TableColumns: TableColum[] = [
  {
    label: 'Name',
    name: 'name'
  },
  {
    label: '24H Low',
    name: 'low_24h'
  },
  {
    label: '24H High',
    name: 'high_24h'
  },
  {
    label: 'Price Change 24H',
    name: 'price_change_24h'
  },
  {
    label: 'Total Volume',
    name: 'total_volume'
  }
];
