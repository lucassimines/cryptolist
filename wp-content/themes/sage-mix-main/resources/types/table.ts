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
    label: '24h Low',
    name: 'low_24h'
  },
  {
    label: '24h High',
    name: 'high_24h'
  }
];
