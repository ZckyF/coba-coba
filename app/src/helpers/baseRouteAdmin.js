import _ from 'lodash';

export default (names) => {
  const children = names.map((name) => ({
    path: `/${_.kebabCase(name)}`,
    name: _.startCase(name),
    component: () => import(`@/views/pages/admin/${name}/Index.vue`),
  }));

  return {
    // path: `/${_.snakeCase(name)}`,
    // name: `${_.startCase(name)}`,
    // component: () => import(`./${name}/Index.vue`),
    path: '',
    component: () => import('@/layouts/AdminLayout.vue'),
    children: children,
  };
};
